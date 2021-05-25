import java.util.*;


public class AccountList
{
    private ArrayList < Account> accounts;

    /**
     * Create a LabClass with  no limit on number of enrolments. 
     * All other details are set to default values.
     */
    public AccountList()
    {
        accounts = new ArrayList < Account>();

    }

    /**
     * Add an account to this account list.
     * @param account the accountobject to be added
     */
    public void addAccount(Account account)
    {
        accounts.add(account);
    }

    /**
     * Return the number of accounts currently held.
     * 
     * @return the number of accounts
     */
    public int getNumberOfAccounts()
    {
        return accounts.size();
    }

    
    /**
     * Provides a list of accounts. 
     * @return a list of accounts
     */
    public String getAccounts()
    {
        String myString = "Account List " ;
        myString = myString + "\nNumber of accounts: " 
                            + getNumberOfAccounts() +"\n";
        
        if (getNumberOfAccounts() > 0 )
        {
            for (Account account : accounts)
            {
                myString = myString + account.toString() + "\n";
            }
        }
      
        return myString;
    }
    
    /**
     * Provides a list of trade accounts. 
     * @return a list of trade accounts
     */
    public String getTradeAccounts()
    {
        String myString = "";
        int numberOfTradeAccounts = 0;
        for (Account account : accounts)
        {
            if (account instanceof TradeAccount)
            {
                myString = myString + account.toString() + "\n";
                numberOfTradeAccounts++;
            }
        }
        myString = "Trade Account List " ;
        myString = myString + "\nNumber of trade accounts: " 
                            + numberOfTradeAccounts +"\n";
       return myString;
    }

    /**
     * Provides a list of personal accounts. 
     * @return a list of personal accounts
     */
    public String getPersonalAccounts()
    {
        String myString = "";
        int numberOfPersonalAccounts = 0;
        for (Account account : accounts)
        {
            if (account instanceof PersonalAccount)
            {
                myString = myString + account.toString() + "\n";
                numberOfPersonalAccounts++;
            }
        }
        myString = "Persoanal Account List " ;
        myString = myString + "\nNumber of personal accounts: " 
                            + numberOfPersonalAccounts +"\n";
       return myString;
    }

    /**
     * removes an account from the list.
     * @param accountNumber The name of the account to be deleted
     * @return true if account deleted otherwise false
     */
    public boolean removeAccount(String accountNumber)
    {
        int index = 0;
        for (Account account : accounts)
        {
            if (accountNumber.equals(account.getAccountNumber()))
            {
                accounts.remove(index);
                return true;
            }
            index++;
        }
        return false;
    }   
    
    /**
     * Calculates and outputs the total number of points held 
     * (a) by account type and (b) as a whole
     * 
     * @return details of the points held (a) by account type 
     * and (b) as a whole.
     */
    public String getTotalPointsHeld()
    {
        String myString = "";
        int noOfPoints = 0;
        int noOfPersonalPoints = 0;
        int noOfTradePoints = 0;
        for (Account account : accounts)
        {
            noOfPoints+= account.getNoOfPoints();
            if (account instanceof PersonalAccount)
            {
                noOfPersonalPoints += account.getNoOfPoints();
            }
            else
            {
                noOfTradePoints += account.getNoOfPoints();
            }
        }
        myString = "Points held in personal accounts: " +  noOfPersonalPoints;
        myString +="\nPoints held in trade accounts: " +  noOfTradePoints;
        myString +="\nPoints held in all accounts: " +  noOfPoints + "\n";
                            
        return myString;
    }
        
   
}
