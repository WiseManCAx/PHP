class my_wordViewmy_word extends JView
{
    
    function display($tpl = null)
    {   
                  //butoni
        JToolBarHelper::title(   JText::_( 'Hello MY_WORD' ), 'generic.png' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
   
                 // polu4ava danni ot model  sys sy6toto ime 'my_word' 4rez f-ta get 
        $items        = & $this->get( 'Data');
                //svyrzvane na dannite imeto na promenlivata sys sydyrjanieto 
        $this->assignRef('items',        $items);
              //izvejdane 

        parent::display($tpl);
    }
}