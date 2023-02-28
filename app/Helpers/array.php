<?php

if (! function_exists('app_array_check_diff')) {
    function app_array_check_diff($newItems, $existingItems, $col='id') {
        //
        $new = [];
        $changed = [];
        $unchanged = [];

        foreach($newItems as $newItem) {
            $handled = false;
            $newItemIds[] = $newItem[$col];
            foreach($existingItems as $existingItem) {
                if ($existingItem[$col] == $newItem[$col]) {
                    if (count(array_diff_assoc($existingItem, $newItem)) == 0) {
                        $unchanged[] = $newItem;
                        $handled = true;
                    } else {
                        $changed[] = $newItem;
                        $handled = true;
                    }
                    break 1;
                }
            }
            if (!$handled) {
                $new[] = $newItem;
            }
        };

        return [
            'new' => $new,
            'changed' => $changed,
            'unchanged' => $unchanged
        ];
    }
}
