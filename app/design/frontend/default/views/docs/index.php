<?php $data['load']->view('docs/toc'); ?>

<div>

    <legend style="width: auto;">Overview</legend>
    <p>
        Thank you for choosing Diamond PHP! Now that installation and configuration is complete, you are ready to code.
    </p>
    <strong>About Diamond PHP</strong>
    <p>
        These documentations assume that you have at least a basic familiarity with the MVC architectural pattern. 
        If you are new to MVC frameworks, there are plenty of high quality articles available online to read up on. 
        A good article for beginners explaining the basics of MVC can be found <a target="_blank" href="http://code.tutsplus.com/tutorials/mvc-for-noobs--net-10488">here</a>.
    </p>
    
    <p>
        We firmly believe in supporting the latest technologies and features, rather than emphasizing support for older legacy 
        systems. As they say, it is difficult to move forward if you are stuck in the past. The core of the framework relies 
        heavily on new features introduced in newer versions of PHP, which is a big reason that we are able to achieve such high 
        levels of performance and stability. It is for this reason that we require PHP version 7. We cannot guarantee that the framework will work as expected if installed on PHP 5. Some of the core functionality <strong>will</strong> break. If your web host does not yet support PHP 7, or if you cannot use it for some other reason, it is recommended to use another framework instead, such as <a href="https://symfony.com/" target="_blank">Symfony</a>. We are big fans of Symfony! However, it would be even better to contact your host and request PHP 7 support, or move to a web host who does support it. <em>"It is difficult to move forward if you are stuck in the past".</em>
    </p>
    <br>
    
    <strong>Using Diamond PHP</strong>
    <p>
        We have went to great lengths to ensure that Diamond PHP has an extremely simple and consistent syntax, as well as being painless 
        to modify and/or extend, and getting out of your way when importing third party libraries. We have even built in some common 
        functionality, such as a login and registration area, a messaging application, a responsive default template, etc.
    </p>
    
    <p>
        You will find that much of your coding will involve the use of the 
        <a href="<?= BASE_URL; ?>documentation/modules/overview">Developer Toolbox</a>, as it comes with the ability to handle many different 
        scenarios that are common to most websites.
    </p>
    <p>
    	Database transactions are handled using PDO directly. A service locator is provided that eliminates the need to import the database each time you need to use it, and initiates the connection for you. View the <a href="<?= BASE_URL; ?>documentation/functions/database">database documentation</a> for more information.<br>We may port the Doctrine ORM in the near future to replace this functionality, if user feedback indicates that is what the users want.
    </p>
    
    <p>
        For those of you who are familiar with MVC, a minor note -- while Diamond PHP is labeled as an MVC framework, like 
        nearly every other PHP framework available, it does not always follow "true" MVC patterns in the strictest sense of the word. 
        At times, it is much closer to the MVP (Model-View-Presenter) or PAC architectural patterns than MVC.<br>
        Do these differences in philosophy matter? Yes, and no...like many things tech related, it comes down to a matter of 
        personal preference, or what you are used to doing. MVC and PAC are merely ideas; a structured way of accomplishing the 
        same goal: separating application logic from presentation code. However, there are also tangible benefits to different architectural patterns. Pure MVC allows for much easier creation of modular code. MVP and PAC architectural patterns allow for code that is much easier to maintain.
    </p>

    <p>Happy coding!</p>
</div>