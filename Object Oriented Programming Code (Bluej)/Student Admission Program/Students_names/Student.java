
/**
 * This is the Student class supplied 
 * to the StudentWithName lab..
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class Student
{
    private Name name;
    private String id;
    private int credits;
    
    public Student(Name name, String id)
    {
        this.name = name;
        this.id = id;
        credits = 0;
    }
    
    // accessors
    public Name getName()
    {
        return name;
    }
    
    public String getID()
    {
        return id;
    }
    
    public int getCredits()
    {
        return credits;
    }
    
    
    
       
    // mutators
    public void setCredits(int credits)
    {
        this.credits = credits;
    }
    
    public void setName(Name name)
    {
        this.name = name;
    }
    
    public void printStudent()
    {
        System.out.println("Name: " + name + " ID: " 
                           + id + " Credits: " + credits);
    }
    
}
