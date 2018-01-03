<h2>Your code goes here.</h2>
<form method="post" action="index.php" id="needs-validation" novalidate>
        {checkbox_list options=$genders name="gender3" inline="false"}
        {radio_list options=$genders name="gender4" inline=true}
        {input_field name="email" type="email" help="a valid email address" required=true}
        {input_field name="first_name" type="text" help="your first name"}
        {input_field name="last_name" type="text"}
        {textarea name="description" help="some help text" required=true}
        {select name="gender" options=$genders help="Select your gender" required=true}
        {checkbox name="accept_terms" help="whatever"}
        {submit class="primary"}
</form>
