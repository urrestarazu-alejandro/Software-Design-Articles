private string FindCountryName (string internetCode)
{
  if (internetCode == "de")
    return "Germany";
  else if(internetCode == "fr") 
    return "France";
  else if(internetCode == "ar")
    return "Argentina";
    // lots of elses
  else
    return "Suffix not Valid";
}