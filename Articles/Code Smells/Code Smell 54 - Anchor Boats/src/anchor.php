<?

final class DatabaseQueryOptimizer {
  
  public function selectWithCriteria($tableName, $criteria) {
    / /Make some optimizations manipulating criterias
  }
  
  private function sqlParserOptimization(SQLSentence $sqlSentence): SQLSentence {
    // Parse the SQL converting it to an string and then working with their nodes as strings and lots of regex
    // This was a very costly operation overcoming real SQL benefits.
    // But since we made too much work we decide to keep the code.
  }  
}