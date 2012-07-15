<?php
class Oauth_Controller extends Base_Controller {

	private $credentials = array(
    	'facebook' => array(
    		'id' => '432030886830847',
	        'secret' => '53b6ddf7546193176ac08dc10e991987'),
	    'google' => array(
	    	'id' => '111272511053',
	        'secret' => 'Zmo-3LjLp2dz729UphqIVJjy'),
	    'github' => array(
	    	'id' => '595c15ba3a550b2d187b',
	        'secret' => '51b27d35c1f10e9b84b6955b7a0768c41f573766'),
	    'windowslive' => array(
	    	'id' => '00000000440CB83A',
	        'secret' => 'EmvZutSbdGgrvzubfFsHO7ZqcIPmu6CR'),
    );

	public function action_session($provider)
	{
	    if( !isset( $this->credentials[$provider] )) return Response::error('404');

		Bundle::start('laravel-oauth2');
	    $provider = OAuth2::provider($provider, $this->credentials[$provider]);

	    if ( ! isset($_GET['code']))
	    {
	        // By sending no options it'll come back here
	        return $provider->authorize();
	    }
	    else
	    {
	        // Howzit?
	        try
	        {
	            $params = $provider->access($_GET['code']);

	            $token = new OAuth2_Token_Access(array('access_token' => $params->access_token));
	            $user = $provider->get_user_info($token);

	            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
	            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
	            //echo "<pre>";
	            //var_dump($user);
				$view = 'register';
	            return View::make('pages.'.$view)->with('user', $user);
	        }

	        catch (OAuth2_Exception $e)
	        {
	            show_error('That didnt work: '.$e);
	        }

	    }
	}

	public function action_deauthorise()
	{
		// Provider has deauthised application; handle this appropriately, trigger attempt to re-authorise.
	}
}