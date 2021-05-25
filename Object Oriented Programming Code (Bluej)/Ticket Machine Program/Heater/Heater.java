
/**
 * Lab work for week 2
 * 
 * @author Andrew Robson 
 * @version 26/01/2017
 */
public class Heater
{
    private int temperature;
    private int max;
    private int min;
    private int increment;

    public void temp()
    {
        temperature = 15;
    }
    public void warmer(int increment)
    {
        if (temperature >= 30)
        {
            temperature = temperature + increment;
        }
        else
        {
            temperature = temperature;
        }
    }
    public void colder(int increment)
    {
        if (temperature <= 0)
        {
            temperature = temperature + increment;
        }
        else
        {
            temperature = temperature;
        }
        temperature = temperature - increment;
    }
    public int getTemperature()
    {
        return temperature;
    }
    public void increment()
    {
        increment = 5;
    }
}
