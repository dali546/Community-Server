<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;
use Joselfonseca\LighthouseGraphQLPassport\GraphQL\Mutations\Login;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterMutation {
    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param mixed[] $args The arguments that were passed into the field.
     * @param GraphQLContext $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     * @throws Exception
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {

        // TODO Add proper validating/resolving
        User::create([
            'username' => $args['data']['username'],
            'email' => $args['data']['email'],
            'password' => Hash::make($args['data']['password'])
        ]);


        // Login...
        $login = new Login();
        return $login->resolve($rootValue, $args, $context, $resolveInfo);
    }
}
