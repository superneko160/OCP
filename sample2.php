<?php
/**
 * OCPを守っている例
 * sample1.phpと異なり、会員ランクごとにクラスを作成
 * 各クラスそれぞれにget_point_multiplierメソッドを実装
 * 
 * こうすることで、新しいランクを追加する場合、新しいクラスを作成するだけでよくなる
 * （既存のクラスには手を加えずに済む）
 */

interface IRank {
    function getPointMultiplier(): int;
    function __toString(): string;
}

class GoldRank implements IRank {

    public function getPointMultiplier(): int {
        return 5;
    }

    public function __toString(): string {
        return 'ゴールド会員';
    }
}

class SilverRank implements IRank {

    public function getPointMultiplier(): int {
        return 3;
    }

    public function __toString(): string {
        return 'シルバー会員';
    }
}

// class PlatinumRank implements IRank {

//     public function getPointMultiplier(): int {
//         return 7;
//     }

//     public function __toString(): string {
//         return 'プラチナ会員';
//     }
// }

class User {
    public string $name;
    public IRank $rank;

    public function __construct(string $name, IRank $rank) {
        $this->name = $name;
        $this->rank = $rank;
    }
}

$testuser = new User('testuser', new SilverRank());
print $testuser->rank->__toString();  // シルバー会員
print $testuser->rank->getPointMultiplier();  // 3
