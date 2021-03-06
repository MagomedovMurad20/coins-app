<?php
namespace App\Services;

use App\Models\User;

class BonusService
{
    public const DAY_TO_BONUS = [10, 15, 20, 25, 30, 50, 100,];

    /**
     * Возвращает бонус за определённый день
     *
     * @param integer $day порядковый номер дня.
     * @return integer бонус.
     */
    static public function getBonusOfDay(int $day): int
    {
        $index = ($day - 1) % count(self::DAY_TO_BONUS);
        return self::DAY_TO_BONUS[$index];
    }

    /**
     * Вычисляет общую сумму бонусов за определённое количество дней. Данный метод нужен пока только для
     * сидера.
     *
     * @param integer $day количество дней.
     * @return integer общая сумма бонусов.
     */
    static public function getTotalCoinsOfNthDay(int $day)
    {
        $sum = 0;
        for ($i = 1; $i <= $day; $i++) {
            $sum += self::getBonusOfDay($i);
        }

        return $sum;
    }

    static public function addBonus($userId): User|null
    {
        $user = User::find($userId);

        if ($user !== null) {
            $now = new \DateTime();
            if ($user->dt !== null) {
                $date = \DateTime::createFromFormat("Y-m-d", $user->dt->format('Y-m-d'));
                $interval = $now->diff($date);
                if ($interval->d === 0) {
                    return $user;
                }
                if ($interval->d === 1) {
                    $user->dt = date('Y-m-d');
                    $user->day = $user->day + 1;
                }
                if ($interval->d > 1) {
                    $user->dt = date('Y-m-d');
                    $user->day = 1;
                }
            } else { //
                $user->dt = date('Y-m-d');
            }

            $user->coins = $user->coins + self::getBonusOfDay($user->day);
            $user->save();
        }

        return $user;
    }
}
