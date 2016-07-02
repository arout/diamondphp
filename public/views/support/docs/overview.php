<div class="white-row">
    <legend>Overview</legend>
    <p>
        Thank you for choosing kW Fusion! Now that installation and configuration is complete, you are ready to code!
    </p>
    <h4>About kW Fusion</h4>
    <p>
        These documentations assume that you have at least a basic familiarity with MVC design patterns. 
        If you are new to MVC frameworks, there are plenty of high quality articles available online to read up on.
    </p>
    <p>
        For those of you who are familiar with MVC, a minor note -- while kW Fusion is labeled as an MVC framework, like 
        nearly every other PHP framework available, it does not follow "true" MVC patterns in the strictest sense of the word. 
        We use controllers for routing and loading models and views. Models are used strictly for retrieving and storing data 
        (our models can also access the <a href="<?= BASEURL; ?>support/toolbox/overview">Developer Toolbox</a> in order to 
        modify, sanitize or validate data before processing data). Views are simply template files that display the web page. 
        In reality, it is much closer to the PAC design pattern than MVC (again, much like the vast majority of frameworks out 
        in the wild).<br>
        Do these differences in philosophy matter? Not a whole lot...like many things tech related, it comes down to a matter of 
        personal preference, or what you are used to doing. MVC and PAC are merely ideas; a structured way of accomplishing the 
        same goal: separating application logic from presentation code.
    </p>
    <p>
        We firmly believe in supporting the latest technologies and features, rather than emphasizing support for older legacy 
        systems. As they say, it is difficult to move forward if you are stuck in the past. The core of the framework relies 
        heavily on new features introduced in newer versions of PHP, which is a big reason that we are able to achieve such high 
        levels of performance and stability. It is for this reason that we require at least PHP 5.5, and preferably version 5.6.
    </p>
    
    <h4>Using kW Fusion</h4>
    <p>
        We have went to great lengths to ensure that kW Fusion has an extremely simple and consistent syntax, as well as being painless 
        to modify and/or extend, and getting out of your way when importing third party libraries. We have even built in some common 
        functionality, such as a login and registration area, a messaging application, a responsive default template, etc.
    </p>
    <p>
        You will find that the vast majority of your coding will involve the use of the 
        <a href="<?= BASEURL; ?>support/toolbox/overview">Developer Toolbox</a>, as it comes with the ability to handle many different 
        scenarios that are common to most websites.
    </p>
</div>