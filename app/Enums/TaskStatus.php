<?php

namespace App\Enums;

enum TaskStatus: string
{
   case InProgress = 'in_progress';
   case Completed = 'completed';
   case OnHold = 'on_hold';
   case Dropped = 'dropped';
   case PlanToDo = 'plan_to_do';

   public static function values(): array
   {
        return array_column(self::cases(), 'value');
   }

   public static function labels(): array
   {
        return [
            self::InProgress->value => 'In Progress',
            self::Completed->value => 'Completed',
            self::OnHold->value => 'On Hold',
            self::Dropped->value => 'Dropped',
            self::PlanToDo->value => 'Plan To Do',
        ];
   }
}

