
/**
 * Class to test Homework 3
 * 
 * @author Alan Maughan
 * @version 01
 */
public class RunHW3
{    
    private String name, id;
    private AccountList accounts;
    private PersonalAccount pa1, pa2;
    private TradeAccount ta1, ta2;
    
    /**
     * Constructor for objects of class HW2Test
     * 
     * @param name the student's name
     * @param id the student's id
     */
    public RunHW3(String yourName, String yourId)
    {
        name = yourName;
        id = yourId;
             
        accounts = new AccountList();        
        runTests();
    }
    
    /**
     * Run the various tests
     */
    
    public void runTests()
    {
        // print header
        System.out.println("Name: " + name + "\tID: " + id + "\n");
        
        testAddPersonalAccountNoPoints();
        testAddPersonalAccountWithPoints();
        testAddTradeAccountNoPoints();
        testAddTradeAccountWithPoints();      
        
        System.out.println("Program complete."); 
      
    }
      
   
    /**
     * Create 2 Personal Accounts 
     */
    
    public void testAddPersonalAccountNoPoints()
    {
        try
        {
            // personal account with no initial points
            pa1 = new PersonalAccount ("Ann", "Archer","1000", 
                             "1 Amble Way", "Amble", "AA1 1AA",
                             "1111111111111111", 'D');
            accounts.addAccount(pa1);
            System.out.println(pa1);                
        }
        catch (Exception e)
        {
            System.out.println("An exception was raised in " 
                   + "testAddPersonalAccountNoPoints.");
        }
    }
        
    public void testAddPersonalAccountWithPoints()
    {
        try
        {
            // personal account with additional points
            pa2 = new PersonalAccount ("Barbara", "Bach","1001",
                           "2 Blyth Boulevard", "Blyth", "BB2 2BB",
                                     "2222222222222222", 'M', 20);
            accounts.addAccount(pa2);
            System.out.println(pa2);            
        }
        catch (Exception e)
        {
            System.out.println("An exception was raised in "
                           + "testAddPersonalAccountWithPoints.");
        }
    }
    
    public void testAddTradeAccountNoPoints()
    {
        try
        {
            // trade account with no initial points
            ta1 = new TradeAccount ("Colin", "Cowdry","1002", 
                       "3 Consett Crescent", "Consett", "CC3 3CC",
                       "Cowdry Construction",
                       "33 Chopwell Close", "Chopwell", "CD3 3CD",
                       "GB333333");
                  
            accounts.addAccount(ta1);                    
            System.out.println(ta1);              
        }
        catch (Exception e)
        {
            System.out.println("An exception was raised "
                             + "in testAddTradeAccountNoPoints.");
        }
    }
    
    public void testAddTradeAccountWithPoints()
    {
        try
        {
            // trade account with initial points
            ta2 = new TradeAccount ("Dave", "Dee","1004",
                       "4 Durham Dwellings", "Durham", "DD4 4DD",
                       "Dee Design", 
                       "44 Darlington Drive", "Darlington", "DE4 4DE",
                       "GB444444", 40);
            accounts.addAccount(ta2);                   
            System.out.println(ta2);            
        }
        catch (Exception e)
        {
            System.out.println("An exception was raised "
                                   + "in testAddTradeAccounts.");
        }
    }
} // end class
