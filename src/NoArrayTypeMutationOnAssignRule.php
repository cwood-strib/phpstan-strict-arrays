<?php

namespace StarTribune\PHPStan;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\Assign;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;

class NoArrayTypeMutationOnAssignRule implements \PHPStan\Rules\Rule
{

  public function getNodeType(): string
  {
    return \PhpParser\Node\Expr\Assign::class;
  }

  public function processNode(Node $node, Scope $scope): array
  {
    // This catches array assignments in the form $arr[] = 123;
    if ($node->var instanceof ArrayDimFetch) {
      $exprType = $scope->getType($node->expr);
      $arrayType = $scope->getType($node->var->var)->getIterableValueType();

      // TODO: Improve error messaging here to include types
      if ($arrayType->isSuperTypeOf($exprType)->no()) {
          return [RuleErrorBuilder::message(
            'Mismatch between array type and type of element being added to array' 
          )->build()];
      }
    }
    return [];
  }
}
