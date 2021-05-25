public class Car extends Vehicle
{
    public Car()
    {
        System.out.println("I'm a Car");
    }
    
     public Car(String name)
    {
       super();
        System.out.println("I'm a Car called " + name );
    }
    
     public Car(String name, int i)
    {
       super(name);
        System.out.println("I'm a Car called " + name );
    }
    
    public void print1()
    {
        System.out.println("I am print1 in Car");
    }
  
}

