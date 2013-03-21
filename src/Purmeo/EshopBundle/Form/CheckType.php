<?php

namespace Purmeo\EshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CheckType extends AbstractType {

    protected $gender = array(
        1 => 'männlich',
        2 => 'weiblich');
    protected $height = array(
        145 => '1,40-1,45 m',
        150 => '1,45-1,50 m',
        155 => '1,50-1,55 m',
        160 => '1,55-1,60 m',
        165 => '1,60-1,65 m',
        170 => '1,65-1,70 m',
        175 => '1,70-1,75 m',
        180 => '1,75-1,80 m',
        185 => '1,80-1,85 m',
        190 => '1,85-1,90 m',
        195 => '1,90-1,95 m',
        200 => '1,95-2,00 m',
        205 => '2,00-2,05 m',
    );
    protected $sport = array(
        1 => '1-2 Std. Sport pro Woche',
        2 => 'Ich mache keinen Sport',
        3 => 'min. 3 Std. Sport pro Woche',
    );
    protected $smoker = array(
        1 => 'ja',
        2 => 'nein'
    );
    protected $drink = array(
        1 => 'Ja',
        2 => 'Nein, ich trinke keinen Alkohol',
    );
    protected $dream = array(
        1 => 'Ja, ich schlafe ruhig und ausreichend lange.',
        2 => 'Nein, ich habe häufig Schlafprobleme.',
        3 => 'Ich habe ab und zu einen unruhigen und zu kurzen Schlaf',
    );
    protected $stress = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $pregnant = array(
        1 => 'ja',
        2 => 'nein',
        3 => 'Ich befinde mich in der Stillzeit',
    );
    protected $grain = array(
        1 => '0-2 mal die Woche',
        3 => '3-5 mal die Woche',
        6 => '6-7 mal die Woche',
    );
    protected $fruit = array(
        1 => 'ja',
        2 => 'nein, ich esse nur selten Obst.',
        3 => 'oft, aber nicht täglich.',
    );
    protected $salad = array(
        1 => 'ja',
        2 => '1-2 schaffe ich',
        3 => 'nein',
    );
    protected $meat = array(
        1 => 'täglich',
        2 => 'Gelegentlich bis nie',
        3 => '2-3 Mal pro Woche',
    );
    protected $fish = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $milk = array(
        1 => 'Ja, jeden Tag',
        2 => 'Nicht immer.',
        3 => 'Nein, Milch ist nichts für mich.',
    );
    protected $water = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $fastfood = array(
        1 => 'ja',
        2 => 'nein, selten bis nie',
        3 => '3-4 Mal pro Woche',
    );
    protected $sweets = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $diet = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $oil = array(
        1 => 'ja',
        2 => 'nein',
    );
    protected $problems = array(
        'iodine' => 'Schilddrüsenerkrankungen, Hyperthyreose',
        'gluten' => 'Gluten-Unverträglichkeit',
        'depression' => 'Depression',
        'iron' => 'Eisenspeichererkrankung, Verwertungsstörungen',
        'diabets' => 'Diabetes mellitus 1 oder 2',
        'blood' => 'Ich nehme blutverdünnende Medikamente',
        'metabolism' => 'Stoffwechselerkrankungen',
        'highblood' => 'Bluthochdruck',
        'fat' => 'Fettstoffwechselstörung',
        'epilepsy' => 'Epilepsie',
        'rheuma' => 'Rheuma',
        'nothing' => 'Nichts trifft auf mich zu'
    );
    protected $agree = array('ok');

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('gender', 'choice', array(
            'choices' => $this->gender,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('weight', 'text', array('required' => false));
        $builder->add('height', 'choice', array(
            'choices' => $this->height,
            'multiple' => false,
            'expanded' => false,
            'required' => false
        ));
        $builder->add('day', 'text', array('required' => false));
        $builder->add('month', 'text', array('required' => false));
        $builder->add('year', 'text', array('required' => false));
        $builder->add('sport', 'choice', array(
            'choices' => $this->sport,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('smoker', 'choice', array(
            'choices' => $this->smoker,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('drink', 'choice', array(
            'choices' => $this->drink,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('dream', 'choice', array(
            'choices' => $this->dream,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('stress', 'choice', array(
            'choices' => $this->stress,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('pregnant', 'choice', array(
            'choices' => $this->pregnant,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('grain', 'choice', array(
            'choices' => $this->grain,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('fruit', 'choice', array(
            'choices' => $this->fruit,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('salad', 'choice', array(
            'choices' => $this->salad,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('meat', 'choice', array(
            'choices' => $this->meat,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('fish', 'choice', array(
            'choices' => $this->fish,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('milk', 'choice', array(
            'choices' => $this->milk,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('water', 'choice', array(
            'choices' => $this->water,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('fastfood', 'choice', array(
            'choices' => $this->fastfood,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('sweets', 'choice', array(
            'choices' => $this->sweets,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('diet', 'choice', array(
            'choices' => $this->diet,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('oil', 'choice', array(
            'choices' => $this->oil,
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('problems', 'choice', array(
            'choices' => $this->problems,
            'multiple' => true,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('agree', 'choice', array(
            'choices' => $this->agree,
            'multiple' => true,
            'expanded' => true,
            'required' => false
        ));
    }

    public function getName() {
        return 'check';
    }

}