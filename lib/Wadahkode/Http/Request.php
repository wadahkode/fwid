<?php
namespace Wadahkode\Http;

final class Request
{
	private $request = [];

	public function __construct(array $request = [])
	{
		if (empty($request)) {
			return false;
		}

		$this->request = $request;
		$this->bootstrapSelf();
	}

	static public function __callStatic($name, $arguments)
	{
		return call_user_func(function($callable) {
      list($class, $method, $arguments) = $callable;

      if (empty($arguments)) {
        return $class->{$method}();
      }

      return $class->{$method}($arguments[0]);

    }, [new self, $name, $arguments]);
	}

	private function bootstrapSelf()
	{
		foreach ($this->request as $key => $value) {
			$this->{$this->toCamelCase($key)} = $value;
		}
	}

	public function get($name, $filter=null)
	{
		$request = Request::fromGlobals();

		foreach ($request as $key => $value) {
			if ($key === $name && !empty($filter)) {
				return trim(filter_var($request->{$name}, $filter));
			}

			return $request->{$name};
		}

    if (array_key_exists('any', $this->request)) {
			if ($this->request['any'] == "") {
        return false;
			} else {
				return $name;
			}
		}
		//return $this->{$name};
	}

	private function toCamelCase($string)
	{
		$result = strtolower($string);

		preg_match_all('/_[a-z]/', $result, $matches);

		foreach ($matches[0] as $match) {
			$c = str_replace('_', '', strtoupper($match));
			$result = str_replace($match, $c, $result);
		}
		return $result;
	}

	static private function fromGlobals()
	{
		$methodGlobals = array_merge($_GET, $_POST, [], $_SERVER, $_COOKIE, $_ENV, $_FILES, $_REQUEST);
    $self = new Self();

    foreach($methodGlobals as $key => $value) {
      $self->{$self->toCamelCase($key)} = $value;
    }

    return $self;
	}
}