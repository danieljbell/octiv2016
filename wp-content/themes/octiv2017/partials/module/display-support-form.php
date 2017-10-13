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

  <div class="fourth mar-b">
    <div>
      <label id="label43792560" class="label" for="field43792560">First Name</label>
      <input type="text" id="field43792560" name="field43792560" size="50" value="<?php if ($first_name) : echo $first_name; endif; ?>" class="fsField" />
    </div>
    <div>
      <label id="label43800133" class="label" for="field43800133">Last Name</label>
      <input type="text" id="field43800133" name="field43800133" size="50" value="<?php if ($last_name) : echo $last_name; endif; ?>" class="fsField" />
    </div>
    <div>
      <label id="label43792592" class="label" for="field43792592">Email</label>
      <input type="text" id="field43792592" name="field43792592" size="50" value="<?php if ($email) : echo $email; endif; ?>" class="fsField" />
    </div>
    <div>
      <label id="label43792596" class="label" for="field43792596">Phone Number</label>
      <input type="tel" id="field43792596" name="field43792596" size="50" value="" class="fsField fsFormatPhoneUS " data-country="US" data-format="user" />
    </div>
  </div>
  <div class="mar-b">
    <label id="label43792599" class="label" for="field43792599">Subject</label>
    <input type="text" id="field43792599" name="field43792599" size="50" value="<?php if ($subject) : echo $subject; endif; ?>" class="fsField" />
  </div>
      
      <label id="label43792600" class="label" for="field43792600">Description</label>
      <textarea id="field43792600" name="field43792600" rows="4" cols="50" class="fsField mar-b"><?php if ($description) : echo $description; endif; ?></textarea>
        
        <p class="fsLabel fsLabelVertical"><input type="checkbox" id="field48958837_1" name="field48958837[]" value="Yes" class="fsField vertical" /> <label class="fsOptionLabel vertical" for="field48958837_1"><strong>Yes,</strong></label> I authorize Octiv Support to access my Octiv account, as needed, to trouble-shoot this issue.</p>
        
      
          <label id="label43792603" class="label" for="field43792603">Browser</label>
          <p>Which browser were you using when you experienced the issue?</p>
          
          <input type="checkbox" id="field43792603_1" name="field43792603[]" value="Chrome" class="fsField vertical" /><label class="fsOptionLabel vertical" for="field43792603_1"> Chrome</label>
          <input type="checkbox" id="field43792603_2" name="field43792603[]" value="Firefox" class="fsField vertical" /><label class="fsOptionLabel vertical" for="field43792603_2"> Firefox</label>
          <input type="checkbox" id="field43792603_3" name="field43792603[]" value="Safari" class="fsField vertical" /><label class="fsOptionLabel vertical" for="field43792603_3"> Safari</label>
          <input type="checkbox" id="field43792603_4" name="field43792603[]" value="Internet Explorer" class="fsField vertical" /><label class="fsOptionLabel vertical" for="field43792603_4"> Internet Explorer</label>
          <input type="checkbox" id="field43792603_5" name="field43792603[]" value="Edge" class="fsField vertical" /><label class="fsOptionLabel vertical" for="field43792603_5"> Edge</label>
              
      
          <label id="label43792612" class="label" for="field43792612">Urgency</label>
          <p id="fsSupporting43792612" class="explination fsSupporting">Please choose your urgency based on the descriptions below</p>
          <select id="field43792612" name="field43792612" size="1" class="fsField fancy">
            <option value="Normal" selected="selected">Normal</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
          </select>
        
      <h4>Urgency Levels</h4>
      <p class="explination"><strong>Critical:</strong><br>Issue has brought business to a halt and requires immediate resolution or workaround.</p>
      <p class="explination"><strong>High:</strong><br>Issue is negatively impacting business but documents are generated with a short-term workaround.</p>
      <p class="explination"><strong>Normal:</strong><br>Issue is a routine inquiry and non-business impacting.</p>
      
      <div class="mar-b">
        <label id="label43792566" class="label" for="field43792566">Screenshot/Attachment</label>
        <p class="explination">File uploads may not work on some mobile devices.</p>
        <input type="file" id="field43792566" name="field43792566" size="30" class="fsField fsUpload uploadTypes-jpg,jpeg,gif,png,bmp,tif,psd,pdf,doc,docx,xls,xlsx,txt,mp3,mp4,aac,wav,au,wmv,avi,mpg,mpeg,zip,gz,rar,z,tgz,tar,sitx" />
      </div>

    <div class="has-text-center">
      <input id="fsSubmitButton2411006" class="fsSubmitButton btn-primary" type="submit" value="Submit Form" style="display: inline-block; width: initial;" />
    </div>

</form>