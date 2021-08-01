import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form } from "antd";

const { Item } = Form;

export const Guardian = () => {
    const { guardian, setGuardian, guardianOccupation, setGuardianOccupation } =
        useContext(DataContext);

    return (
        <>
            <Item
                name="guardian"
                label="Name of Father / Mother / Guardian"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={guardian}
                    onChange={setGuardian}
                    type="text"
                    placeholder="Eg: James Sirius Potter"
                />
            </Item>
            <Item
                name="guardian_occupation"
                label="Occupation of Father / Mother / Guardian"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={guardianOccupation}
                    onChange={setGuardianOccupation}
                    type="text"
                    placeholder="Eg: Musician"
                />
            </Item>
        </>
    );
};
