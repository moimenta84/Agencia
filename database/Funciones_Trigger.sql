CREATE OR REPLACE FUNCTION calcular_precio_reserva()
RETURNS TRIGGER AS $$
DECLARE
    precio_noche NUMERIC (10,2);
    dias INTEGER;
BEGIN

	 IF NEW.f_salida <= NEW.f_entrada THEN
        RAISE EXCEPTION 'La fecha de salida (%s) debe ser posterior a la fecha de entrada (%s)', 
                        NEW.f_salida, NEW.f_entrada;
    END IF;
    
    SELECT precioxnoche INTO precio_noche
    FROM hotel
    WHERE id_hotel = NEW.id_hotel;

    dias := GREATEST(NEW.f_salida - NEW.f_entrada, 1);
	
    NEW.precio_h := dias * precio_noche;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trigger_calcular_precio_reserva
BEFORE INSERT OR UPDATE ON reservar
FOR EACH ROW
EXECUTE FUNCTION calcular_precio_reserva();

/*2*/

CREATE OR REPLACE FUNCTION calcular_precio_elegir()
RETURNS TRIGGER AS $$
DECLARE
    precio_dia NUMERIC (10,2);
    dias INTEGER;
BEGIN

    SELECT precioxdia INTO precio_dia
    FROM destino
    WHERE id_destino = NEW.id_destino;

    dias := GREATEST(NEW.f_vuelta - NEW.f_ida, 1);

    NEW.precio := dias * precio_dia;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trigger_calcular_precio_elegir
BEFORE INSERT OR UPDATE ON elegir
FOR EACH ROW
EXECUTE FUNCTION calcular_precio_elegir();
