USE jamin;
DROP PROCEDURE IF EXISTS sp_CreateProductPerLeverancier;

DELIMITER $$

CREATE PROCEDURE sp_CreateProductPerLeverancier(
    IN p_leverancierId INT UNSIGNED,
    IN p_productId INT UNSIGNED,
    IN p_aantal TINYINT,
    IN p_datumEerstvolgendeLevering DATE
)

BEGIN
    INSERT INTO ProductPerLeverancier(
        LeverancierId
        ,ProductId
        ,DatumLevering
        ,Aantal
        ,DatumEerstvolgendeLevering
    )
    VALUES (p_leverancierId, p_productId, CURDATE(), p_aantal, p_datumEerstvolgendeLevering);

    SELECT LAST_INSERT_ID() AS new_id;
    
    UPDATE Magazijn
    SET AantalAanwezig = AantalAanwezig + p_aantal
    WHERE Magazijn.ProductId = p_productId;
END$$

DELIMITER ;