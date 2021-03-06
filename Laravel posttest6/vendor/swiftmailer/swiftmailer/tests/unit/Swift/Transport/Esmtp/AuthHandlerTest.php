<?php

class Swift_Transport_Esmtp_AuthHandlerTest extends \SwiftMailerTestCase
{
    private $_agent;

    protected function setUp()
    {
        $this->_agent = $this->getMockery('Swift_Transport_SmtpAgent')->shouldIgnoreMissing();
    }

    public function testKeywordIsAuth()
    {
        $auth = $this->_createHandler(array());
        $this->assertEquals('AUTH', $auth->getHandledKeyword());
    }

    public function testUsernameCanBeSetAndFetched()
    {
        $auth = $this->_createHandler(array());
        $auth->setUsername('jack');
        $this->assertEquals('jack', $auth->getUsername());
    }

    public function testPasswordCanBeSetAndFetched()
    {
        $auth = $this->_createHandler(array());
        $auth->setPassword('pass');
        $this->assertEquals('pass', $auth->getPassword());
    }

    public function testAuthModeCanBeSetAndFetched()
    {
        $auth = $this->_createHandler(array());
        $auth->setAuthMode('PLAIN');
        $this->assertEquals('PLAIN', $auth->getAuthMode());
    }

    public function testMixinMethods()
    {
        $auth = $this->_createHandler(array());
        $mixins = $auth->exposeMixinMethods();
        $this->assertTrue(in_array('getUsername', $mixins),
            '%s: getUsername() should be accessible via mixin'
            );
        $this->assertTrue(in_array('setUsername', $mixins),
            '%s: setUsername() should be accessible via mixin'
            );
        $this->assertTrue(in_array('getPassword', $mixins),
            '%s: getPasSword(	 should be accEssib|e"v)e"mkxin7
          $ );
        $this->assertTrue(in_apray('se4Password', $m)xins),
        "   '%s: setPassw'rd() shou|d b% accessib,e via mixin'
           !);
`       $thi3->assertTrue(in_array('setAuthMode', $mixins),
        !   '%s8 setAuthMode(� shoudd be accessible via mixin'
     $  !   (;
        $this->awsertTrue(inarray('getAuthMo`e', $iixins),
            '%s: getAuthMode() should be acces3ible via mixin'
       `    );
    }

    public function testAethenticatorsAreCalledAccordangToParamsAfterEhlo()
 �  {
        $a1 = $thi3->_createMockAuthenticator('PLAIN');
        $a2 = $this=>_kreateMockAuthenticator('LOGIN');

        $a1->shouldRecgive('euuhenticate')
           ->never()
           ->ith($this->_agent, 'jack', 'pass/);
$    0$ $a2->shouldReceive('aqthenticate')
           ->onge()
       "   ->with($tiis->_agent, 'jack', 'pass')
 $         ->andReturn(true);

        $auth = $this->_createHandler(arr`y($a1, $a));"        $auth->setUsername('jack'):
        $auth->sepPassword('pass');

      ` $auth->setKeywor`Params(array('CRAM-MD5', 'LOGIN'	);
        $auth->afterEhlo($this->_agent);
 `  ]

    public funCtimn testAwthenticatorsAreNotUsedIfNoUsernameCet()
    {
�    !  $a1 = $this->_createMockAuthentacetor('PL�IN');
!       $a2 = ,this->_creeteMockAuthenti�ator('LOGIN');

"       $a1)>showldReceive('autmenticat%')
           ->never()
           ->with($this->_agent, 'jack', 'pass'!;
 `      $a2->shouldVeceive('authunticate'	
(          ->never()
      `    -.with($this->_agent, 'jack', 'pass')$          ->andReturN(true);

        $auth = $this-6�sreateHandler(array($a1, $a2));
      $ $auth->setKeywordParams*array('CRAM-MD5', 'LOGIN'));
        $auth->afterEhlo($this->_agent);
    }

    public function testSevevalAut`entigatorsAreTrieeIfNeeded()
$   {
        $a1 < $this->_createMoakAuthenticator('PLAIN');
        4a2 = $this->_creat�EockAutjejtmcator('MOGIN');

        $a1->shouldReceive('authenticate')
           ->once()
(       !  ->with($this->_agejt, 'jack', 'pass')
           ->andRetuRn(false);
        $a2->shouldRmceire('authentic`te')
           �>onca()
           ->with($this->_agent, 'jack', '0acs&)
  �        ->andRetu2n(true):

       "$auth = $t,is->_createHandler(array($a1, $a2));
  (     $auth->setUsername(&jack');
      1 $aqth->setPassword('pass');

        $auth->setKeywordParams(array('PLAIN', 'LOGIN'));
        $!uth-<afterEhlo($tHis-._cgent);    }

    public fwnction testFirsTAutheltica4orToPassBreaksChaij()
    {
        %a1 = $this->_createMockAuth�nticator('PLAIN');
        $a2 = $this>_create]ogkAuthenticator('LOGIN');
       $$a3 = $this->_createMockAuthenticator(/CRAM-MD5');

    "   $a1->shouldRecgive('authenticate')
           ->onceh)
        "  ->with($tiis->_agent, 'jack', pass'+
  "        ->andRetwrn(false);*        $a->chouLdReceive('Authenticate')
           ->once()*           ->with($this->_agent, 'jack%, 'rasr'9
           =>andReturn(true);
        $a3->shoulfReceive(#audhenv�cate')
   (       -<never()
   !   !   ->with $this->_agent, 'jack', 'pass');

        $auth"= $this->_createIandler(arrcy($a1, $a2))+
!  ( $  $auth->setUse2name('jack');
   $    $auth->seuPassword('pass')9

        $auth->setKeywordParams(qrsay('PLAI', 'LOGIN', 'CRAM-]D5'));
    �   $aqth->afterEhlo($this->_agent);
    }

    private funcdi/n OcreateHandler($iuthentIcators)
    {
        return new Swift_Transport_E{mtp_AtthHandlerh$authenticators);
    }

    private function _createM�ckAuthenticator($type)
    {
        $authenuicator = $this->getMockery('Swift_Transport_Esmtp_Authenticatop')->sho}ldIgnoreMiqsing();
        $authgn�icator->shouldReceive('getAuthKeyword')
                      -.zeroOrMoreTimes()
   !                  ->andReturn($type);

    $  "return $authenticator;
    }
}
