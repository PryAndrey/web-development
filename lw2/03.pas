PROGRAM HelloFriend(INPUT, OUTPUT);
USES DOS;
VAR
  Query, Name, NameOfParametr: STRING;
  I: INTEGER;
BEGIN
  WRITELN('Content-Type: text/html');
  WRITELN;
  Query := GetEnv('QUERY_STRING');

  IF (Length(Query) > 0)
  THEN
    BEGIN
      NameOfParametr := Copy(Query, 1, 5);
      IF NameOfParametr = 'name='
      THEN 
        BEGIN
          FOR I := POS('=', Query) + 1 TO Length(Query)
          DO
            Name := CONCAT(Name, Query[I]);
          WRITELN('Hello Dear, ', Name, '!')
        END
      ELSE
        WRITELN('Hello Anonymous!')
    END
  
END.

