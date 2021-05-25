import java.awt.*; 
import javax.swing.*; 

/**
 * Write a description of class FrameEx1 here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class FrameEx1 extends JFrame
{
    public FrameEx1() 
    {
        super("Frame Ex1");
        showFrame();
    }

    private  void showFrame()  
    {    
       setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
       setSize(200,100);
       setLocationRelativeTo(null);
       setVisible(true);
    } 

}
