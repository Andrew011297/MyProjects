
/**
 * The Student class will be used to effectively
 * obtain the full name, ID and number of credits 
 * taken from the user
 * 
 * @author Andrew Robson 
 * @version 26/01/2017
 */
public class Student
{
    //The students full name
    private String name;
    //the student ID
    private String id;
    //The amount of credits for the study taken so far
    private int credits;     


     /**
     * Create storage for the students information 
     * i.e. full name and ID
     *
     * @param fullName the full name of the student
     * @param studentID the ID of the student
     */
     public Student (String fullName, String studentID)
     {
         name = fullName;
    
         id = studentID;
            
         credits = 0;
     }

     /**
      * Return the full name of the student
      */
     public String getName()
     {
         return name;
     }

     /**
      * Return the ID of the student
      */
     public String getID()
     {
         return id;
     }

     /**
      * Return the amount of credits for the student
      */
     public int getCredits()
     {
         return credits;
     }
     
     public void changeName(String replacementName)
     {
         
         name = replacementName;
     }
     
     public void addCredits(int additionalPoints)
     {
         credits = credits + additionalPoints;
     }
     
     public void printStudent()
     {
         System.out.println(name + "("+id+")");
     }
     
     public void printID()
     {
         System.out.println(credits);
     }
     
     public String getLoginName()
     {
         return name.substring(0, 4) + id.substring(0, 3);
         
     }
    }
     