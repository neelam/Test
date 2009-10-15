<?php
//English
class language_class{

	private $error_msg = array('REQUIRE_USERNAME' => 'Please enter your user name.',
	'MIN_USERNAME' => 'Minimum length of user name is 3',
	'MAX_USERNAME' => 'Maximum length of user name is 50',
	'S_INVALID_USERNAME' => 'Invalid user name.',
	'S_USERNAME_AVAILABLE' => 'User name is available.',
	'S_USERNAME_NOT_AVAILABLE' => 'User name is not available.',

	'REQUIRE_PASSWORD' => 'Please enter your password',
	'MIN_PASSWORD' => 'Minumum length of password is 6',
	'MAX_PASSWORD' => 'Maximum length of password is 50',

	'REQUIRE_CONFIRM_PASSWORD' => 'Please enter your confirm password',
	'MIN_CONFIRM_PASSWORD' => 'Minumum length of password is 6',
	'MAX_CONFIRM_PASSWORD' => 'Maximum length of password is 50',
	'CONFIRM_PASSWORD_EQUAL_TO' => 'Please enter the same password as above.',
	'S_INVALID_PASSWORD' => 'Invalid Password',

	'S_SEND_PASSWORD_SUCCESS' => 'Sent password successfully.',

	'REQUIRE_EMAIL' => 'Please enter your email.',
	'MAX_EMAIL' => 'Maximum length of email is 50',
	'INVALID_EMAIL' => 'Please enter a valid email address.',
	'S_EMAIL_AVAILABLE' => 'Email is available.',
	'S_EMAIL_NOT_AVAILABLE' => 'Email is not available.');

	private $language = array('FORGOT_PASSWORD?' => 'Forgot Password?',
	'SIGN_UP_NOW' => 'SIGN UP NOW',
	'MEMBER_LOGIN' => 'Member login',
	'VISIT_THE_FORMER_PLASA_COM' => 'Back to former plasa.com',
	'SEARCH_ANYTHING_HERE' => 'Search anything here',
	'SEARCH' => 'Search',
	'FIND' => 'Find',
	'FORGOT_PASS_TEXT' => 'Your register email address',
	'BACK_TO_LOGIN' => 'Back to login',
	'CHECKING_EMAIL' => 'Checking email...',
	'CHECKING_USERNAME' => 'Checking user name...',
	'CHECK_AVAILABILITY' => 'Check availability',
	'HOME' => 'Home',
	'MERCHANT_DIRECTORY' => 'Merchant Directory',
	'HOW_TO_BUY' => 'How to buy',
	'SUPPORT' => 'Support',
	'QUICK_CART' => 'Quick Cart',
	'YOUR_CART_IS_EMPTY_NOW' => 'Your cart is empty now',
	'GO_TO_YOUR_SHOPPING_CART' => 'Go to your shopping cart',
	'HOT_PRODUCTS' => 'Hot Products',
	'FEATURED_PRODUCTS' => 'Featured Products',
	'FEATURED_MERCHANTS' => 'Featured Merchants',
	'SORT_BY' => 'Sort By',
	'SELECT_CATEGORY' => 'Select Category',
	'ADVERTISING' => 'Advertising',
	'PRIVACY_POLICY' => 'Privacy policy',
	'TERMS_CONDITIONS' => 'Terms & Conditions',
	'SITEMAP' => 'Sitemap',
	'REPORT' => 'Report',
	'ADVERTISE' => 'Advertise',
	'COPY_RIGHT' => 'Copyright &copy; 2004-2009. plasa.com. All rights reserved.',
	'READMORE' => 'Read more',

	'COMPANY_NAME' => 'Company Name',
	'COMPANY_REG_NO' => 'Company Reg No:',
	'ADDRESS' => 'Address:',
	'CONTACT_NO' => 'Contact No:',
	'EMAIL' => 'Email:',
	'ABOUT' => 'About',

	'MALL_PRODUCT_CODE' => 'Mall Product Code:',
	'MERCHANT_PRODUCT_C0DE' => 'Merchant Product Code:',
	'PRICE' => 'Price:',
	'PRODUCT_DESC' => 'Product Description:',

	'GET_PASSWORD' => 'Get Password',
	'USER_REGISTRATION' => 'User Registration',

	'REGISTRATION_SUCCESSFUL' => 'Registered Successfully!',
	'REGISTRATION_SUCCESSFUL_TEXT' => 'Your account has been registered. Please check your e-mail to activate your account.',
	
	'EDIT_PROFILE' => 'Edit Profile',
	'SIGN_OUT' => 'Signout',
	'VIEW_PROFILE' => 'View Profile'

	);

	private	$label = array('USERNAME' => 'User name', 'PASSWORD' => 'Password', 'CONFIRM_PASSWORD' => 'Confim Password', 'EMAIL' => 'Email');

	public function getSinglelanguage($lan_name)
	{
		if(isset($this->language) && $this->language != null)
			return $this->language[$lan_name];
		return '';
	}
	public function getSingleError_msg($msg_name)
	{
		if(isset($this->error_msg) && $this->error_msg != null)
			return $this->error_msg[$msg_name];
		return '';
	}
	public function getSingleLabel($label_name)
	{
		if(isset($this->label) && $this->label != null)
			return $this->label[$label_name];
		return '';
	}


}

?>