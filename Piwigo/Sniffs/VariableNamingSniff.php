<?php

namespace Piwigo\Sniffs;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class VariableNamingSniff implements Sniff
{

  /**
   * Registers the tokens that this sniff wants to listen for.
   *
   * @return array<int>
   */
  public function register()
  {
    return [T_VARIABLE];
  }

  /**
   * Called when one of the token types that this sniff is listening for is found.
   *
   * @param File $phpcs_file The PHP_CodeSniffer file where the token was found.
   * @param mixed $stack_ptr The position in the PHP_CodeSniffer file's token stack where the
   *                         token was found.
   *
   * @return void|int
   */
  public function process(File $phpcs_file, $stack_ptr)
  {
    $variable_token = $phpcs_file->getTokens()[$stack_ptr];
    $variable_name = ltrim($variable_token['content'], '$');

    // Must start with a letter and only contain lowercase letters and numbers.
    $is_snake_case = preg_match('/^[a-z][a-z0-9_]*$/', $variable_name) > 0;
    $globals = [
      '_SERVER',
      '_GET',
      '_POST',
      '_FILES',
      '_REQUEST',
      '_SESSION',
      '_ENV',
      '_COOKIE',
      'GLOBALS',
    ];
    if (!$is_snake_case && !in_array($variable_name, $globals)) {
      $phpcs_file->addError(
        'Variable names must be in snake_case; found `$%s`',
        $stack_ptr,
        'Piwigo.VariableNaming.SnakeCaseOnly',
        [$variable_name]
      );
    }
  }
}
