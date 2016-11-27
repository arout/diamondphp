<?php
namespace Hal\Module;

class Pagination
{

	private $db;
	private $route;
	# Total records found
	public $total;
	# URL segment used to track current page
	public $url_segment;
	# Records per page to display; defaults to 10
	public $per_page;
	# SQL query offset
	public $startpoint;

	public function __construct($c)
	{
		$this->db    = $c['database'];
		$this->route = $c['router'];
	}

	public function config($sql, $url_segment = NULL, $per_page = 20)
	{
		if (is_null($url_segment))
		{
			$this->url_segment = $this->route->request[1];
		}
		else
		{
			$this->url_segment = $url_segment;
		}

		$this->per_page = $per_page;

		$this->startpoint = ($this->url_segment * $this->per_page) - $this->per_page;

		$query = $this->db->prepare($sql);
		$query->execute();

		$this->total = $query->rowCount();
	}

	public function paginate($adjacents = 5)
	{
		$page  = 1;
		$page  = $this->url_segment;
		$start = ($page - 1) * $this->per_page;

		$prev     = $page - 1;
		$next     = $page + 1;
		$lastpage = ceil($this->total / $this->per_page);
		$lpm1     = $lastpage - 1;

		$pagination = "";
		if ($lastpage > 1)
		{
			$pagination .= "<ul class='pagination'>";

			if ($lastpage < 7 + ($adjacents * 2))
			{
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$pagination .= "<li><a class='btn-default'>$counter</a></li>";
					}
					else
					{
						$pagination .= "<li><a href=$counter>$counter</a></li>";
					}

				}
			}
			elseif ($lastpage > 5 + ($adjacents * 2))
			{
				if ($page < 1 + ($adjacents * 2))
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
						{
							$pagination .= "<li><a class='btn-default'>$counter</a></li>";
						}
						else
						{
							$pagination .= "<li><a href=$counter>$counter</a></li>";
						}

					}
					$pagination .= "<li class='dot'>...</li>";
					$pagination .= "<li><a href=$lpm1>$lpm1</a></li>";
					$pagination .= "<li><a href=$lastpage>$lastpage</a></li>";
				}
				elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination .= "<li><a href='1'>1</a></li>";
					$pagination .= "<li><a href='2'>2</a></li>";
					$pagination .= "<li class='dot'>...</li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
						{
							$pagination .= "<li><a class='btn-default'>$counter</a></li>";
						}
						else
						{
							$pagination .= "<li><a href=$counter>$counter</a></li>";
						}

					}
					$pagination .= "<li class='dot'>..</li>";
					$pagination .= "<li><a href=$lpm1>$lpm1</a></li>";
					$pagination .= "<li><a href=$lastpage>$lastpage</a></li>";
				}
				else
				{
					$pagination .= "<li><a href='1'>1</a></li>";
					$pagination .= "<li><a href='2'>2</a></li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$pagination .= "<li><a class='btn-default'>$counter</a></li>";
						}
						else
						{
							$pagination .= "<li><a href=$counter>$counter</a></li>";
						}

					}
				}
			}

			if ($page < $counter - 1)
			{
				$pagination .= "<li><a href=$next>Next</a></li>";
				$pagination .= "<li><a href=$lastpage>Last</a></li>";
			}
			else
			{
				# On last page
				$pagination .= "<li><a href=1>Back to First</a></li>";
			}

			$pagination .= "<li><a class='btn-default'>Page $page of $lastpage</a></li>";
			$pagination .= "</ul>";
		}

		return $pagination;
	}
}
