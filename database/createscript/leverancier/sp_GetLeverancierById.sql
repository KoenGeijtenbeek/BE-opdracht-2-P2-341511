DROP PROCEDURE IF EXISTS sp_GetLeverancierById;

DELIMITER $$

CREATE PROCEDURE sp_GetLeverancierById(
    IN p_id INT
)

BEGIN

    SELECT LVRC.Id
          ,LVRC.Naam AS LeverancierNaam
          ,LVRC.ContactPersoon
          ,LVRC.LeverancierNummer
          ,LVRC.Mobiel
          ,PRDT.Naam AS ProductNaam
          ,MGZN.AantalAanwezig
          ,MGZN.VerpakkingsEenheid
          ,MAX(PPLV.DatumLevering) AS DatumLaatsteLevering
    FROM Product PRDT
    INNER JOIN ProductPerLeverancier PPLV ON PRDT.Id = PPLV.ProductId
    INNER JOIN Leverancier LVRC ON LVRC.Id = PPLV.LeverancierId
    INNER JOIN Magazijn MGZN ON MGZN.ProductId = PRDT.Id
    WHERE LVRC.Id = p_id
    GROUP BY PPLV.ProductId;

END$$

DELIMITER ;