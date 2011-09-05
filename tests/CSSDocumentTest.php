<?php
require_once __DIR__.'/../CSSParser.php';
/**
 * 
 */
class CSSDocumentTest extends PHPUnit_Framework_TestCase
{
  /**
   * 
   **/
  public function testMergeDeclarations()
  {
    $sFile = __DIR__.'/files/merge.css';
    $oParser = new CSSParser(file_get_contents($sFile));
    $oDoc = $oParser->parse();
    $aDeclarations = $oDoc->getAllDeclarationBlocks();
    $sMerged = CSSDocument::mergeDeclarations($aDeclarations)->__toString();
    $sExpected = "{color: rgb(255,0,0);background: rgb(0,255,255) none repeat-x 0% 0% scroll;margin: 0 0 1em;}";
    $this->assertEquals(trim($sMerged), $sExpected);
  }
}
