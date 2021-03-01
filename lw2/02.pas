PROGRAM SarahRevere(INPUT, OUTPUT);
USES DOS;
VAR
  Query: STRING;
  Lanterns: CHAR;
  Name, I: INTEGER;
BEGIN {SarahRevere}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Query := GetEnv('QUERY_STRING');
  Lanterns := '-';

  IF (Length(Query) > 0)
  THEN
    BEGIN
      I := POS('=', Query) + 1;
      Name := POS('lanterns=', Query);
      IF Name = '1'
      THEN
        IF I > 1
        THEN
          IF (Query[I] = '1') OR (Query[I] = '2')
          THEN
            Lanterns := Query[I];
    END;

  IF (Lanterns > '0') AND (Lanterns < '3')
  THEN
    WRITE('The British are coming by ');
    IF Lanterns = '1'
    THEN
      WRITELN('land.')
    ELSE
      IF Lanterns = '2'
      THEN
        WRITELN('sea.')
  ELSE
    WRITELN('The North Church shows only''', Lanterns, '''.');
END. {SarahRevere}



