import java.awt.*; 
import java.awt.event.* ;
import javax.swing.*;

public class ButtonEx3 extends JFrame
{
   private JButton bChange;
   
   public ButtonEx3()  
   {
       super("Button Ex3");
       makeFrame();
       showFrame(); 	
       
   }
   
   public void makeFrame()  
   {
         setLayout( new FlowLayout());
         bChange = new JButton("Click Me!");
         add(bChange);
         bChange = new JButton("Im here also!");
         add(bChange);
   }
    
    public void showFrame()   
    {    
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        setSize(200,150);
        setVisible(true);
    }
} // end class
