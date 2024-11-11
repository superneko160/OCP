<?php
/**
 * OCPに反している例
 * 以下の場合、新しい会員ランクが追加された場合、既存の関数に手を加える必要がある
 */

const RANK = [
    'GOLD' => 'ゴールド会員',
    'SILVER' => 'シルバー会員',
    // 'PLATINUM' => 'プラチナ会員',
];

class User {
    public string $name;
    public string $rank;

    public function __construct(string $name, string $rank) {
        $this->name = $name;
        $this->rank = $rank;
    }
}

/**
 * ユーザによってポイントの倍率を返す
 * @param User $user ユーザ
 * @return int ポイント倍率
 */
function getPointMultiplier(User $user): int {
    switch ($user->rank) {
        case RANK['GOLD']:
            return 5;
            break;
        case RANK['SILVER']:
            return 3;
            break;
        // この修正は問題なく動作していたgetPointMultiplier関数へ影響を与える可能性がある
        // case RANK['PLATINUM']:
        //     return 7;
        //     break;
    }
    return 1;
}

$testuser = new User('testuser', RANK['SILVER']);
print $testuser->rank;  // シルバー会員
print getPointMultiplier($testuser);  // 3
