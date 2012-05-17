<?php 

namespace Engine;

class AldermanTest extends \PHPUnit_Framework_TestCase {
	public $subject = null;

	public function setUp() {
		$html = file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Alderman/test1.html');
		$this->subject = new Alderman();
		$this->subject->parse($html);
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function test_parser_name() {
		$this->assertEquals('Adilson Amadeu', $this->subject->name);
	}

	public function test_parser_politicalParty() {
		$this->assertEquals('Partido Trabalhista Brasileiro (PTB)', $this->subject->politicalParty);
	}

	public function test_parser_biography() {
		$expected = <<<EOT
Adilson Amadeu é despachante e empresário. Adepto do esporte, representou  o Brasil na categoria master de natação em campeonatos europeus.
Sua empresa, a  SODESP, já intermediou mais de 2 milhões de documentos. É uma das líderes e  isso o levou à presidência do sindicato dos despachantes (1994-98) e do  Conselho Federal dos Despachantes Documentalistas, em 2002. Foram seus  primeiros passos na política. Em 2004, Adilson Amadeu foi eleito vereador, pelo  PTB, com 28.354 votos. Em 2008, foi reeleito com 41.686.
Como vereador,  é fiscalizador do executivo e integrante ativo das comissões parlamentares de  inquérito.  O trabalho da CPI dos Centros  Desportivos Municipais,  permitiu à  prefeitura criar programas como o Clube Escola. Em 2006, os alvos foram os  promotores de eventos que não atendiam a legislação, nem ofereciam segurança  aos frequentadores.
Em 2007, Adilson  Amadeu foi eleito 1º vice-presidente. Nesse mesmo ano participou da  comissão que apurou a sonegação de impostos por bingos,  quase R$ 800 milhões. Em 2008.  reeleito vice-presidente,  presidiu a Comissão que investigava a dívida  de mais de R$ 2 bilhões de ISS dos bancos. A justiça suspendeu os trabalhos da  CPI.  Na presidência da Comissão de Trânsito,  Transporte e Atividade Econômica   verificou de perto a situação dos terminais de ônibus e questionou,  junto ao Tribunal de Contas, o valor da tarifas.
Adilson Amadeu é um crítico ferrenho da indústria de multas de trânsito”. Seu lema é “educar  antes de nultar”. Autor da lei do parcelamento administrativo das multas, buscou  uma oportunidade  para os inadimplentes  regularizarem seus veículos e o município promover  melhorias no trânsito.
Nesse ano de 2010, Adilson  Amadeu é membro da Comissão de Finanças e   preside a CPI das Enchentes que investiga as causas das inundações e os  contratos feitos com as prestadoras de serviço. Busca soluções para prevenir a  repetição de enchentes e desmoronamentos em áreas de  risco.
EOT;
		$this->assertEquals($expected, $this->subject->biography);
	}

	public function test_parser_phone() {
		$this->assertEquals('(0xx11) 3396-4628', $this->subject->phone);
	}

	public function test_parser_fax() {
		$this->assertEquals('(0xx11) 3396-3967', $this->subject->fax);
	}

	public function test_parser_email() {
		$this->assertEquals('adilsonamadeu@camara.sp.gov.br', $this->subject->email);
	}

	public function test_parser_addressCorrespondence() {
		$expected = <<<EOT
Câmara Municipal de São Paulo
Palácio Anchieta
Viaduto Jacareí, 100. Sala 315. 3º Andar. - Bela Vista - São Paulo - SP - CEP 01319-900
Telefone: 3396-4628
EOT;
		$this->assertEquals($expected, $this->subject->addressCorrespondence);
	}

	public function test_parser_avatar() {
		$this->assertEquals('imgs/fotos/adilsonamadeu.jpg', $this->subject->avatar);
	}
}