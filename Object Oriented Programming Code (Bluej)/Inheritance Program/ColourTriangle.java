
/**
 * Write a description of class ColourTriangle here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class ColourTriangle extends Triangle
{
    private String colour;
    
    public ColourTriangle( String colour, String style, double width, double length)
    {
        super(style, width, length);
        this.colour = colour;
        System.out.println("CT") ;
    }
    
    public String getColour()
    {
        return colour;
    }
        
}
