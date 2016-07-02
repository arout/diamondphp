<?php
namespace Hal\Toolbox;

/**
 * Used to sanitize inputs by default (file/post/get)
 * 
 * Validating filters:
 *
 *   Are used to validate user input
 *   Strict format rules (like URL or E-Mail validating)
 *   Returns the expected type on success or FALSE on failure
 *
 * Sanitizing filters:
 *
 *   Are used to allow or disallow specified characters in a string
 *   No data format rules
 *   Always return the string
 *
 */

class Performance {

	public function check_latency( $site ) {
		
		$ch = curl_init( $site );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate') );
		curl_setopt( $ch, CURLOPT_HEADER, 1 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		// Execute
		curl_exec( $ch );
		
		// Check if any error occurred
		if( ! curl_errno( $ch ) ) {
		 $info = curl_getinfo( $ch );
		
		if( $info['total_time'] <= (float) 0.5 )
			$info['total_time'] = '<div class="progress-bar progress-bar-success" data-appear-progress-animation="25%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['total_time'].' seconds</span>
			</div>';
		elseif( $info['total_time'] <= (float) 0.99 && $info['total_time'] >= (float) 0.51 ) {
			$info['total_time'] = '<div class="progress-bar progress-bar-warning" data-appear-progress-animation="55%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['total_time'].' seconds</span>
			</div>';
		}
		else
			$info['total_time'] = '<div class="progress-bar progress-bar-danger" data-appear-progress-animation="85%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['total_time'].' seconds</span>
			</div>';
			
		return $info['total_time'];
		}
		
		// Close handle
		curl_close($ch);
	}
	public function check_latency_raw( $site ) {
		
		// Unformatted output
		$ch = curl_init( $site );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate') );
		curl_setopt( $ch, CURLOPT_HEADER, 1 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		// Execute
		curl_exec( $ch );
		
		// Check if any error occurred
		if( ! curl_errno( $ch ) ) {
		 $info = curl_getinfo( $ch );
			
		  return $info['total_time'];
		}
		
		// Close handle
		curl_close($ch);
	}
	
	public function check_download_speed( $site ) {
		
		$ch = curl_init( $site );
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		// Execute
		curl_exec( $ch );
		
		// Check if any error occurred
		if( ! curl_errno( $ch ) ) {
		 $info = curl_getinfo( $ch );
		
		if( $info['speed_download'] >= 70001 )
			$info['speed_download'] = '<div class="progress-bar progress-bar-success" data-appear-progress-animation="92%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['speed_download'].' Mbps</span>
			</div>';
		elseif( $info['speed_download'] <= 70000 && $info['speed_download'] >= 35000 )
			$info['speed_download'] = '<div class="progress-bar progress-bar-warning" data-appear-progress-animation="62%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['speed_download'].' Mbps</span>
			</div>';
		else
			$info['speed_download'] = '<div class="progress-bar progress-bar-danger" data-appear-progress-animation="32%" data-appear-animation-delay="200">
			<span class="progress-bar-tooltip">'.$info['speed_download'].' Mbps</span>
			</div>';
			
		return $info['speed_download'];
		}
		// Close handle
		curl_close($ch);
	}
	
	public function check_download_speed_raw( $site ) {
		
		$ch = curl_init( $site );
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		// Execute
		curl_exec( $ch );
		
		// Check if any error occurred
		if( ! curl_errno( $ch ) ) {
		 $info = curl_getinfo( $ch );
		
		return $info['speed_download'];
		}
		// Close handle
		curl_close($ch);
	}
}
