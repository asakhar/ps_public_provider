<?php
class ClassBuffer {
  private array $container;
  private int $n;
  private int $csize;
  function __construct(int $size) {
    if($size <= 0 || !is_integer($size))
      throw new TypeError;
    $this->container = array_fill(0, $size, 0);
    $this->n = $size;
    $this->csize = 0;
  }
  /**
   * Добавление элемента наверх стека. будет успешно, если стек еще не заполнен
   * если стк переполнен, элемент добавлен не будет
   * @param $item - элемент, который нужно добавить
   * @return bool - true если элемент добавлен в стек, иначе false
   */
  public function addItem($item): bool {
    if ($this->csize == $this->n) {
      return false;
    }

    $this->container[$this->csize] = $item;
    $this->csize += 1;
    return true;
  }
  /**
   * Вытащить верхний элемент из стека и вернуть его
   * Если стек пустой, вернет NULL
   * @return mixed верхний элемент их буфера
   */
  public function getItem() {
    if ($this->csize == 0) {
      return NULL;
    }

    $this->csize -= 1;
    return $this->container[$this->csize];
  }
  /**
   * Вернет общий размер стека (максимальный)
   * @return int - максимальный размер стека
   */
  public function getBufferSize(): int {
    return $this->n;
  }
  /**
   * Вернет количество элементов, которые сейчас находятся в стеке
   * @return int - количество элементов в стеке
   */
  public function getCurrentBufferSize(): int {
    return $this->csize;
  }
}
if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {

  $buffer = new ClassBuffer(5); // создать стек на 5 элементов
  echo $buffer->getBufferSize() . PHP_EOL; // 5
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 0
  $buffer->addItem(10) . PHP_EOL;
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 1
  $buffer->addItem(20) . PHP_EOL;
  $buffer->addItem(30) . PHP_EOL;
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 3
  $buffer->addItem(40);
  $buffer->addItem(50); // true
  $buffer->addItem(60); // false
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 5
  echo $buffer->getItem() . PHP_EOL; // 50
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 4
  echo $buffer->getItem() . PHP_EOL; // 40
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 3
  $buffer->getItem();
  $buffer->getItem();
  $buffer->getItem();
  echo $buffer->getCurrentBufferSize() . PHP_EOL; // 0
}