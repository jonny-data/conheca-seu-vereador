<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

use jonnydata\csv\data\Session;

/**
 * Acesso a dados de sessões.
 */
abstract class SessionDataAccess {
	/**
	 * Encontra as sessões segundo um critério.
	 * @param array $criteria
	 * @return array[Session]
	 */
	public abstract function find(array $criteria);
	
	/**
	 * Encontra uma sessão segundo um critério.
	 * @param array $criteria
	 * @return Session
	 */
	public abstract function findOne(array $criteria);
	
	/**
	 * Encontra todas as sessões.
	 * @return array[Session]
	 */
	public abstract function findAll();
	
	/**
	 * Salva uma organização.
	 * @param Session $session
	 */
	public abstract function save(Session $session);
	
	/**
	 * Remove uma sessão segundo um critério.
	 * @param array $criteria
	 */
	public abstract function remove(array $criteria);
	
	/**
	 * Atualiza uma sessão.
	 * @param Session $session
	 * @param array $criteria
	 * @return Session
	 */
	public abstract function update(Session $session, array $criteria);
}