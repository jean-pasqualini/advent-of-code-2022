Old strategy
=============

```
if (!$this->isInRange($head) || !$keepSecurityDistance) {
            $this->direction = $head->getDirection();
            switch ($head->getDirection()) {
                case self::MOVE_UP:
                    $this->x = $head->getX();
                    $this->y = $head->getY() + 1;
                    break;
                case self::MOVE_DOWN:
                    $this->x = $head->getX();
                    $this->y = $head->getY() - 1;
                    break;
                case self::MOVE_LEFT:
                    $this->x = $head->getX() + 1;
                    $this->y = $head->getY();
                    break;
                case self::MOVE_RIGHT:
                    $this->x = $head->getX() - 1;
                    $this->y = $head->getY();
                    break;
            }
        }
```