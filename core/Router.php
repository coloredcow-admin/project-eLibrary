<?php
class Router{
	protected $routes=[];
	public static function load($file){
		$router = new static;
		require $file;
		return $router;
	}
	public function define($routes){
		$this->routes=$routes;
	}	
	public function direct($uri){
		try{
			if(array_key_exists($uri,$this->routes)){
				return $this->routes[$uri];
			}
			throw new Exception("<div class='bg-light container-fluid' style='height:calc(100vh - 150px);'>
				<div class='d-flex justify-content-center w-100 h-100' ><h1 class='my-auto'>Page Not Found!</h1>
				 	</div></div><footer class='d-flex align-content-end row justify-content-center font-weight-bold '><div class='border-top container-fluid p-2'><p class='text-center pt-3'>eLibrary &copy; 2020 &nbsp;<a href='https://coloredcow.com/' target='blank' class='text-white'><img src='https://coloredcow.com/wp-content/themes/ColoredCow/dist/img/logo.png' alt='ColoredCow' width='120' class='mb-2'></a></p></div></footer>");
		}
		catch (Exception $e){
			die($e->getMessage()); 
		}
	}
}

?>