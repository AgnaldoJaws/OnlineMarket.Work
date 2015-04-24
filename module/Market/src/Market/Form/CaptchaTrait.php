<?php
namespace Market\Form;

   class CaptchaTrait
{
    protected $captchaOptions;	
	/**
	 * @return the $captchaOptions
	 */
	public function getCaptchaOptions() {
		return $this->captchaOptions;
	}

	/**
	 * @param field_type $captchaOptions
	 */
	public function setCaptchaOptions($captchaOptions) {
		$this->captchaOptions = $captchaOptions;
	}
	
}