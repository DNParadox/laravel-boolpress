<?php

use Illuminate\Database\Seeder;
use App\UserSelect;
use Illuminate\Support\Str;

class UsersSelectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_selects = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Contorni',
            'Scelta dello Chef'
        ];

        // Per ogni elemento dell'array categories creiamo una nuova riga nel db
        foreach ($users_selects as $user_select) {
            $new_user_select = new UserSelect();
            $new_user_select->name = $user_select;
            $new_user_select->slug = Str::slug($user_select, '-');
            $new_user_select->save();
        }
    }
}
