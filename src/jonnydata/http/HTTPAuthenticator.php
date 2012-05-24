<?php
/**
 * Classes e interfaces relacionadas com o protocolo HTTP
 * @package jonnydata\http
 */
namespace jonnydata\http;

/**
 * Interface para definição de um autenticador HTTP.
 */
interface HTTPAuthenticator {
	/**
	 * Autentica uma requisição HTTP.
	 * @param	HTTPRequest $httpRequest
	 */
	public function authenticate(HTTPRequest $httpRequest);
}