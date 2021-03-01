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
      I := POS('=', Query);
      IF NameOfParametr = 'name='
      THEN
        BEGIN
          Name := Copy(Query, 6, (Length(Query)-I));
          IF Length(Name) > 0
          THEN
            WRITELN('Hello Dear, ', Name, '!')
          ELSE
            WRITELN('Hello Anonymous!')
        END
      ELSE
        WRITELN('Hello Anonymous!')
    END
  ELSE
    WRITELN('Hello Anonymous!')
END.
