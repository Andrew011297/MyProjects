
/**
 * Write a description of class Name here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class Name
{
    private String first;
    private String second;
    private String last;
    private String fullName;
    private Name name;
    private String id;
    
    public Name(String first, String last)
    {
        this.first = first;
        this.last = last;
        name = new Name(first, last);
    }
    
    public Name(String first, String second, String last)
    {
        this.first = first;
        this.second = second;
        this.last = last;
        name = new Name(first, second, last);
    }
    
    public String getFirst()
    {
        if (first != null)
        {
            return first;
        }
        else
        {
            System.out.println("First name is missing");
        }
        return first;
    }
    
    public String getSecond()
    {
        if (second != null)
        {
            return second;
        }
        else
        {
            System.out.println("Second name is missing");
        }
        return second;
    }
    
    public String getLast()
    {
        if (last != null)
        {
            return last;
        }
        else
        {
            System.out.println("The last name is missing");
        }
        return last;
    }
    
    public String getFullName()
    {
        return fullName;
    }
    
    public String getLoginName()
    {
        return name.getLast().substring(0, 4) + id.substring(0, 3);
    }
    
    
    public void setFirst(String first)
    {
        name.setFirst(first);
    }
    
    public void setSecond(String second)
    {
        name.setSecond(second);
    }
    
    public void setLast(String last)
    {
        name.setLast(last);
    }
    
    public void printName()
    {
        System.out.println(first + second + last);
    }
}
