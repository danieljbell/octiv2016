<?php
  $first_name = $_GET['first_name'];
  $last_name = $_GET['last_name'];
  $email = $_GET['email'];
  $subject = $_GET['subject'];
  $description = $_GET['description'];
?>

<form method="post" novalidate enctype="multipart/form-data" action="https://www.formstack.com/forms/index.php" class="fsForm fsSingleColumn fsMaxCol1 support-form" id="fsForm2411006">
  <input type="hidden" name="form" value="2411006" />
  <input type="hidden" name="viewkey" value="Ge6erEEE6p" />
  <input type="hidden" name="hidden_fields" id="hidden_fields2411006" value="" />
  <input type="hidden" name="_submit" value="1" />
  <input type="hidden" name="incomplete" id="incomplete2411006" value="" />
  <input type="hidden" name="incomplete_password" id="incomplete_password2411006" />
  <input type="hidden" name="style_version" value="3" />
  <input type="hidden" id="viewparam" name="viewparam" value="339466" />
  <div class="fsPage" id="fsPage2411006-1">
    <div class="fsSection fs1Col">
    <div class="half">
    	<div id="fsRow2411006-1" class="input-block">
    	    <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792560" lang="en">
    	      <label id="label43792560" class="label" for="field43792560">First Name</label>
    	      <div><input type="text" id="field43792560" name="field43792560" size="50" value="<?php if ($first_name) : echo $first_name; endif; ?>" class="fsField" /></div>
    	    </div>
    	  </div>
    	  <div id="fsRow2411006-2" class="input-block">
    	    <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43800133" lang="en">
    	      <label id="label43800133" class="label" for="field43800133">Last Name</label>
    	      <div><input type="text" id="field43800133" name="field43800133" size="50" value="<?php if ($last_name) : echo $last_name; endif; ?>" class="fsField" /></div>
    	    </div>
    	  </div>
    	  <div id="fsRow2411006-3" class="input-block">
          <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792592" lang="en">
            <label id="label43792592" class="label" for="field43792592">Email</label>
            <div><input type="text" id="field43792592" name="field43792592" size="50" value="<?php if ($email) : echo $email; endif; ?>" class="fsField" /></div>
          </div>
        </div>
        <div id="fsRow2411006-4" class="input-block">
          <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792596" lang="en">
            <label id="label43792596" class="label" for="field43792596">Phone Number</label>
            <div><input type="tel" id="field43792596" name="field43792596" size="50" value="" class="fsField fsFormatPhoneUS " data-country="US" data-format="user" /></div>
          </div>
        </div>
    </div>
      <div id="fsRow2411006-5" class="input-block">
        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792599" lang="en">
          <label id="label43792599" class="label" for="field43792599">Subject</label>
          <div><input type="text" id="field43792599" name="field43792599" size="50" value="<?php if ($subject) : echo $subject; endif; ?>" class="fsField" /></div>
        </div>
      </div>
      <div id="fsRow2411006-6" class="input-block">
        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792600" lang="en">
          <div><label id="label43792600" class="label" for="field43792600">Description</label></div>
          <textarea id="field43792600" name="field43792600" rows="10" cols="50" class="fsField"><?php if ($description) : echo $description; endif; ?></textarea>
        </div>
      </div>
      <div id="fsRow2411006-7" class="input-block">
        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792603" aria-describedby="fsSupporting43792603" lang="en">
          <label id="label43792603" class="label" for="field43792603">Browser</label>
          <p id="fsSupporting43792603" class="explination fsSupporting">Which browser were you using when you experienced the issue?</p>
          <div><fieldset id="label43792603">
<div class="fieldset-content half">
<label class="fsOptionLabel vertical" for="field43792603_1"><input type="checkbox" id="field43792603_1" name="field43792603[]" value="Chrome" class="fsField vertical" />Chrome</label>
<label class="fsOptionLabel vertical" for="field43792603_2"><input type="checkbox" id="field43792603_2" name="field43792603[]" value="Firefox" class="fsField vertical" />Firefox</label>
<label class="fsOptionLabel vertical" for="field43792603_3"><input type="checkbox" id="field43792603_3" name="field43792603[]" value="Safari" class="fsField vertical" />Safari</label>
<label class="fsOptionLabel vertical" for="field43792603_4"><input type="checkbox" id="field43792603_4" name="field43792603[]" value="Internet Explorer" class="fsField vertical" />Internet Explorer</label>
</div></fieldset></div>
        </div>
        <p></p>
      </div>
      <div id="fsRow2411006-8" class="input-block">
        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792612" aria-describedby="fsSupporting43792612" lang="en">
          <label id="label43792612" class="label" for="field43792612">Urgency</label>
          <p id="fsSupporting43792612" class="explination fsSupporting">Please choose your urgency based on the descriptions below</p>
          <div><select id="field43792612" name="field43792612" size="1" class="fsField fancy">
            <option value="Normal" selected="selected">Normal</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
          </select></div>
        </div>
      </div>
      <h4>Urgency Levels</h4>
      <p class="explination"><strong>Critical:</strong><br>Production issue has brought business to a halt, require immediate resolution or workaround.</p>
       <p class="explination"><strong>High:</strong><br>System performance issue or bug affecting some but not all users. Short-term workaround is available, but not scalable.</p>
       <p class="explination"><strong>Normal:</strong><br>Inquiry regarding a routine technical issue; information requested on application capabilities, navigation, installation or configuration; issue affecting efficiency but not functionality. Reasonable workaround available.</p>
      <div id="fsRow2411006-9" class="input-block">
        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100" id="fsCell43792566" lang="en">
          <label id="label43792566" class="label" for="field43792566">Screenshot/Attachment</label>
          <p class="explination">File uploads may not work on some mobile devices.</p>
          <div>
            <input type="file" id="field43792566" name="field43792566" size="30" class="fsField fsUpload uploadTypes-jpg,jpeg,gif,png,bmp,tif,psd,pdf,doc,docx,xls,xlsx,txt,mp3,mp4,aac,wav,au,wmv,avi,mpg,mpeg,zip,gz,rar,z,tgz,tar,sitx" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="fsSubmit2411006" class="fsSubmit fsPagination">
    <button type="button" id="fsPreviousButton2411006" class="fsPreviousButton" value="Previous Page" style="display:none;"><span class="fsFull">Previous</span><span class="fsSlim">←</span></button>
    <button type="button" id="fsNextButton2411006" class="fsNextButton" value="Next Page" style="display:none;"><span class="fsFull">Next</span><span class="fsSlim">→</span></button>
    <input id="fsSubmitButton2411006"
    class="fsSubmitButton"
    style="display: block;"
    type="submit"
    value="Submit Form" />
    <div class="clear"></div>
  </div>
</form>
