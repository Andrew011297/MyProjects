import java.awt.*; 
import javax.swing.*; 

/**
 * Write a description of class TextEx5 here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class TextEx5 extends JFrame 
{
    private JTextField jtfName;
    private JLabel jlbName;
    
     public TextEx5()
    {
        super("Text Ex 5");
        makeFrame();
        showFrame();
    }

    private void makeFrame() 
    { 
        setLayout( new FlowLayout() );
        jtfName = new JTextField( 15);
        jlbName = new JLabel( "Enter your name: ");
        add(jlbName);
        add(jtfName);
        jtfName = new JTextField( 15);
        jlbName = new JLabel( "Enter your age: ");
        add(jlbName);
        add(jtfName);
    } 

    private  void showFrame()  
    {      
        setResizable(false);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE );
        setSize(300,75); 
        setLocationRelativeTo( null); 
        setVisible( true );
    }
}
