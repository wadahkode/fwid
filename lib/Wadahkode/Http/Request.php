<?php
namespace Wadahkode\Http;

class Request
{
	public $request = [];

	public function __construct(array $request = [])
	{
		$this->request = $request;
		$this->bootstrapSelf();
	}

	private function bootstrapSelf()
	{
		foreach ($this->request as $key => $value) {
			$this->{$this->toCamelCase($key)} = $value;
		}
	}

	public function get($property)
	{
    if (array_key_exists('any', $this->request)) {
			if ($this->request['any'] == "") {
        return false;
			} else {
				return $property;
			}
		}
		//return $this->{$property};
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

	public function fromGlobals()
	{
		return new Self(array_merge(
			$_GET,
			$_POST,
			[],
			$_SERVER,
			$_COOKIE,
			// $_ENV,
			$_FILES,
			// $_REQUEST
		));
	}
}