$(document).ready(function() {

	$("#trigger_line").hide();
	$("#action_line").hide();
    //Selecting Trigger tables
    $("#trigger").change(function() {
        $("#trig_val").val($(this).val());
    	$("#trigger_line").show();
    	$("#trigger_design").empty();
    	$("#trigger_hints").empty();
        switch($(this).val()){
            /* Every One Else */
            case "1":
                $("#trigger_hints").append('<p>For everything else this action will be triggered/p>');
                break;
                /*Location*/
            case "2":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="IN" name="country"></textarea>');
                $("#trigger_hints").append('<p>Enter the country code. 1 country code in each line. Use standard country codes</p>');
                break;
                /*Landing Page*/
            case "3":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Enter the URL" name="landing_page"></textarea>');
                $("#trigger_hints").append('<p>Enter the URLs, One URL in each line, Use star(*) at the end of url for a group of pages<br/>eg. http://swiftdetector.com/sports/*</p>');
                break;

                /*Time Of Visits*/
            case "6":
            	$("#trigger_design").append('<input type="text" class="form-control" name="visit_time" placeholder="Enter Time">');
                $("#trigger_hints").append('<p>Enter visit time eg . 13:35 -14:05</p>');
                break;
                /* Bots*/
            case "7":	
                $("#trigger_hints").append('<p>For each bots</p>');
                break;
                /* Whois */
            case "8":
            	
                $("#trigger_hints").append('<p>For each whois</p>');	
                break;
                /* User-Agent*/
            case "9":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="User agent" name="ua"></textarea>');
                $("#trigger_hints").append('<p>For each User-Agent</p>');
                break;
                /*Browser*/
            case "10":
            	$("#trigger_design").append('<select class="form-control" name="browser"><option>Firefox</option><option>Chrome</option><option>Safari</option><option>Opera</option><option>UCBrowser</option><option>IE</option></select">');
                $("#trigger_hints").append('<p>Select a Browser (chrome, safari, firefox, ie, opera, ucbrowser)</p>');
                break;
                /*Operating System*/
            case "11":
            	$("#trigger_design").append('<select class="form-control" name="os"><option>Windows</option><option>Linux</option><option>MacOS</option><option>Unix</option><option>RedHat</option></select">');
                $("#trigger_hints").append('<p>Select OS (windows, linux, mac, unix, redhat)</p>');
                break;
                /*Moile Device  */
            case "12":
            	$("#trigger_design").append('<select class="form-control" name="device"><option>Desktop</option><option>Mobile</option></select>');
                $("#trigger_hints").append('<p>Choose the device type</p>');
                break;
                /* Reffrer*/
            case "13":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Eneter Rfrer Link" name="refrer"></textarea>');
                $("#trigger_hints").append('<p>Enter one Reffrer link in one line</p>');
                break;
                /*Incoming Search Term*/
            case "14":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Incoming search term" name="searchterm"></textarea>');
                $("#trigger_hints").append('<p>Incoming search term seprated by comma</p>');
                break;
                /*IP Range */
            case "15":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="IP RAnge"></textarea>');
                $("#trigger_hints").append('<p>Enter the IP range in following mode<br>168.240.10.10-168.241.10.10<br>192.168.25.*<br></p>');
                break;
                /*Active Login*/
            case "16":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Eneter blah blah"></textarea>');
                $("#trigger_hints").append('<p>Active Login.. If user logged i then only do this action</p>');
                break;
                /*JavaScript Enabled*/
            case "17":
            	
                $("#trigger_hints").append('<p>If JavaScript enabled then only perform this action.</p>');
                break;
                /* Repeat Visitor */
            case "18":
            	
                $("#trigger_hints").append('<p>Perform only if Visitor is coming again</p>');
                break;
                /*Custo Javascript*/
            case "19":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Custom Javscript"></textarea>');
                $("#trigger_hints").append('<p>Do not include javascript starting and closing tag </p>');
                break;
                /*Custom PHP Script*/
            case "20":
            	$("#trigger_design").append('<textarea class="form-control" placeholder="Write the php Script, Connection to database will be deleted automatically"></textarea>');
                $("#trigger_hints").append('<p>Write the php script, please do no use database Connection.. It will be auto deleted<br>Resulting your action not to be performed </p>');
                break;

        } //end of switch
    });
    $("#action").change(function() {
        $("#act_val").val($(this).val());
    	$("#action_line").show();
    	$("#action_design").empty();
    	$("#action_hints").empty();
        switch($(this).val()) {
            /*do nothing*/
            case "1":
            	 $("#action_hints").append('<p>Nothing Will be performed</p>');
                break;
                /*Wait...*/
            case "2":
            	$("#action_design").append('<input class="form-control" placeholder="time duration in seconds" name="wait_time">');
                $("#action_hints").append('<p>Enter time duration in seconds</p>');
                break;
                /*Redirect*/
            case "3":
            	$("#action_design").append('<input class="form-control" placeholder="URL" name="redirect_to">');
                $("#action_hints").append('<p>Enter the url to be redircted to.</p> ');
                break;
                /*Post Values*/
            case "4":
            	$("#action_design").append('<textarea class="form-control" placeholder="Eneter details" name="post_values"></textarea >');
                $("#action_hints").append('<p>Enter the name and value to post...   eg.<br>name=ahmad<br/>age=18<br>gender=male</p>');
                break;
                /*Overlay Iframe*/
            case "5":
            	$("#action_design").append('<input class="form-control" placeholder="Iframe URL" name="iframe">');
                $("#action_hints").append('<p>Enter Iframe URL</p>');
                break;
                /*PopUp*/
            case "6":
            	$("#action_design").append('<textarea class="form-control" placeholder="Content to popup" name="popup"></textarea>');
                $("#action_hints").append('<p>Write a content to be popup</p>');
                break;
                /*Hide Content*/
            case "7":
            	$("#action_design").append('<textarea class="form-control" placeholder="write ids to be hidden" name="hide_tag"></textarea>');
                $("#action_hints").append('<p>Write the id of content to hide seprated by coma</p>');
                break;
                /*Replace Content*/
            case "8":
            	$("#action_design").append('<input class="form-control" placeholder="id of the contents" name="replace_tag"> Enter the id to replace contents<br/><textarea name="replace_value" class="form-control" placeholder="New Content"></textarea>');
                $("#action_hints").append('<p>Write the new contents </p>');
                break;
                /*Send Email*/
            case "9":
            	$("#action_design").append('Your Email ID<input type="text" class="form-control" name="to" placeholder="Enter Your Email ID"><br/>Enter the subjet<input class="form-control" type="text" name="subject" placeholder="Enter the subjet"><br/>Write Your message here<textarea class="form-control"  name="message" placeholder="Write Your message here"></textarea>');
                $("#action_hints").append('<p>Write the mail message</p>');
                break;
                /*Run Javascript*/
            case "10":
            	$("#action_design").append('<textarea class="form-control" name="code_js" placeholder="Write the Javascript here"></textarea>');
                $("#action_hints").append('<p>do not include opeining and closing tags of javascript</p>');
                break;
                /*Run Php*/
            case "11":
            	$("#action_design").append('<textarea class="form-control" name="code_php" placeholder="Code"></textarea>');
                $("#action_hints").append('<p>Write the php script, please do no use database, it will be auto deleted</p>');
                break;
        } //end break
    });
});