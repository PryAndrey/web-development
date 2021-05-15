PROGRAM QueryFetch(INPUT, OUTPUT);
USES DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query, Value: STRING;
  KeyPos, I: INTEGER;
BEGIN
  Value := '';
  Query := GetEnv('QUERY_STRING');
  I := POS(Key, Query);
  IF I > 0
  THEN
    BEGIN
      KeyPos := POS(Key, Query) + Length(Key) + 1;
      I := KeyPos;
      WHILE (I < Length(Query)) AND (Query[I] <> '&')
      DO
        BEGIN
          Value := Value + Query[I];
          I := I + 1
        END;
    END;
  GetQueryStringParameter := Value
END;

BEGIN {QueryFetch}
  WRITELN('Content-Type: text/plain');
  WRITELN;

  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {QueryFetch}
