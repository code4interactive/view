<?php
namespace Code4\View\Test;

use Code4\View\Attributes;

class AttributesTest extends \PHPUnit_Framework_TestCase {

    public function testAddingAndReplacing()
    {
        $attributes = new Attributes([
            'class' => 'class1 class2',
            'data-target' => '#target',
            'arrayAttribute' => ['attr1','attr2']
        ]);

        $this->assertEquals('class1 class2', $attributes->get('class'));

        $attributes->add('class', 'class3');
        $this->assertEquals('class1 class2 class3', $attributes->get('class'));

        $attributes->replace('class', 'class1 class2');
        $this->assertEquals('class1 class2', $attributes->get('class'));

        $attributes->add('notExistingAttribute', 'value');
        $this->assertEquals('value', $attributes->get('notExistingAttribute'));

        $attributes->add('arrayAttribute', 'attr3');
        $this->assertEquals('attr1,attr2,attr3', $attributes->get('arrayAttribute', ','));

        //Test czy nowo dodawane atrybuty są w postaci arraya - tylko takie można zrzucić z innym łącznikiem
        $attributes->add('notExistingArrayAttribute', 'attr1');
        $attributes->add('notExistingArrayAttribute', 'attr2');
        $this->assertEquals('attr1,attr2', $attributes->get('notExistingArrayAttribute', ','));
    }

    public function testAllAndSingle() {
        $attributes = new Attributes([
            'class' => 'class1 class2',
            'data-target' => '#target',
            'arrayAttribute' => ['attr1','attr2']
        ]);
        $this->assertEquals('class="class1 class2" data-target="#target" arrayAttribute="attr1 attr2" ', $attributes->all());
        $this->assertEquals('class="class1 class2" ', $attributes->single('class'));
    }

    public function testRemove() {
        $attributes = new Attributes([
            'class' => 'class1 class2',
            'data-target' => '#target',
            'arrayAttribute' => ['attr1','attr2']
        ]);

        $attributes->remove('arrayAttribute', 'attr1');
        $this->assertEquals('attr2', $attributes->get('arrayAttribute'));

        $attributes->remove('class', 'class2');
        $this->assertEquals('class1 ', $attributes->get('class'));
    }

    public function testHas() {
        $attributes = new Attributes([
            'class' => 'class1 class2',
            'data-target' => '#target',
            'arrayAttribute' => ['attr1','attr2']
        ]);

        $this->assertEquals(true, $attributes->has('class'));
        $this->assertEquals(false, $attributes->has('not'));
    }

    public function testFind() {
        $attributes = new Attributes([
            'class' => 'class1 class2',
            'data-target' => '#target',
            'arrayAttribute' => ['attr1','attr2']
        ]);

        $this->assertEquals(true, $attributes->findInKey('arrayAttribute', 'attr1'));
        $this->assertEquals(false, $attributes->findInKey('arrayAttribute', 'attr4'));
        $this->assertEquals(true, $attributes->findInKey('data-target', '#target'));
        $this->assertEquals(false, $attributes->findInKey('data-target', '#target2'));
    }
}